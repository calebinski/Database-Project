DELIMITER //

CREATE PROCEDURE GetTeams()
	BEGIN
		SELECT team.Team_Name, member.Active_Character
		FROM team
		INNER JOIN user ON user.User_ID = team.Owner_ID
		INNER JOIN member ON memeber.Team_ID = team.Team_ID;
	END //

CREATE PROCEDURE GetTeamsByUserID(IN userID INT)
	BEGIN
		SELECT team.Team_Name, member.Active_Character
		FROM team
		INNER JOIN user ON user.User_ID = team.Owner_ID
		INNER JOIN member ON memeber.Team_ID = team.Team_ID
		WHERE member.User_ID = userID;
	END //

CREATE PROCEDURE GetTeamsByOwnerID(IN ownerID INT)
	BEGIN
		SELECT team.Team_Name, member.Active_Character
		FROM team
		INNER JOIN user ON user.User_ID = team.Owner_ID
		INNER JOIN member ON memeber.Team_ID = team.Team_ID
		WHERE team.Owner_ID = ownerID;
	END //	

CREATE PROCEDURE GetTeamMembers(IN teamName VARCHAR(64))
	BEGIN
		SELECT Username, Active_Character
		FROM Member
		INNER JOIN Team ON Member.Team_ID = Team.Team_ID
		INNER JOIN User ON Member.User_ID = User.User_ID
		WHERE Team.Team_Name = teamName;
	END //

CREATE PROCEDURE GetTeamNames()
	BEGIN
		SELECT Team_Name
		FROM team;
	END //

CREATE PROCEDURE GetTeamNamesByMember(IN userid VARCHAR(5))
	BEGIN
		SELECT Team_Name
		FROM team 
		INNER JOIN member ON team.Team_ID = member.Team_ID
		WHERE member.User_ID = userid;
	END //

CREATE PROCEDURE GetTeamNamesByOwner(IN ownerid VARCHAR(5))
	BEGIN
		SELECT Team_Name
		FROM team 
		WHERE Owner_ID = ownerid;
	END //

CREATE PROCEDURE GetCharacter(IN userID INT, IN charName VARCHAR(32))
        BEGIN
                SELECT Character_Name, Character_Level, Character_Class
                FROM Player_Character
                WHERE Owner_ID = userID AND Character_Name = charName;
        END //

CREATE PROCEDURE GetCharacters(IN userID INT)
	BEGIN
		SELECT Character_Name, Character_Level, Character_Class
		FROM Player_Character
		WHERE Owner_ID = userID;
	END //

CREATE PROCEDURE GetCharacterGear(IN userID INT, IN charName VARCHAR(32))
	BEGIN
		SELECT User_ID, Character_Name, Gear_Name, Equipped_Gear.Gear_Type, Intellect, Strength, Agility, Stamina, Armor, Magic_Resist
		FROM Equipped_Gear
		INNER JOIN Gear ON Equipped_Gear.Gear_ID = Gear.Gear_ID
		WHERE Equipped_Gear.User_ID = userID AND Equipped_Gear.Character_Name = charName;
	END //

CREATE PROCEDURE GetCharacterStats(IN givenID INT, IN givenName VARCHAR(32))
	BEGIN

		DECLARE TempInt INT;
		DECLARE TempStr INT;
		DECLARE TempAgi INT;
		DECLARE TempSta INT;
		DECLARE TempArm INT;
		DECLARE TempMar INT;

		SELECT sum(((gear.Intellect / 100 * player_character.Intellect))) + player_character.Intellect AS intellect_total
		INTO TempInt
		FROM player_character
		INNER JOIN equipped_gear
		ON player_character.Owner_ID = equipped_gear.User_ID AND equipped_gear.Character_Name = player_character.Character_Name
		INNER JOIN gear
		ON equipped_gear.Gear_ID = gear.Gear_ID
		WHERE Owner_ID = givenID AND Player_Character.Character_Name = givenName
		group by player_character.Owner_ID, player_character.Character_Name;

		SELECT sum(((gear.strength / 100 * player_character.strength))) + player_character.strength AS strength_total
		INTO TempStr
		FROM player_character
		INNER JOIN equipped_gear
		ON player_character.Owner_ID = equipped_gear.User_ID AND equipped_gear.Character_Name = player_character.Character_Name
		INNER JOIN gear
		ON equipped_gear.Gear_ID = gear.Gear_ID
		WHERE Owner_ID = givenID AND Player_Character.Character_Name = givenName
		group by player_character.Owner_ID, player_character.Character_Name;

		SELECT sum(((gear.agility / 100 * player_character.agility))) + player_character.agility AS agility_total
		INTO TempAgi
		FROM player_character
		INNER JOIN equipped_gear
		ON player_character.Owner_ID = equipped_gear.User_ID AND equipped_gear.Character_Name = player_character.Character_Name
		INNER JOIN gear
		ON equipped_gear.Gear_ID = gear.Gear_ID
		WHERE Owner_ID = givenID AND Player_Character.Character_Name = givenName
		group by player_character.Owner_ID, player_character.Character_Name;

		SELECT sum(((gear.stamina / 100 * player_character.stamina))) + player_character.stamina AS stamina_total
		INTO TempSta
		FROM player_character
		INNER JOIN equipped_gear
		ON player_character.Owner_ID = equipped_gear.User_ID AND equipped_gear.Character_Name = player_character.Character_Name
		INNER JOIN gear
		ON equipped_gear.Gear_ID = gear.Gear_ID
		WHERE Owner_ID = givenID AND Player_Character.Character_Name = givenName
		group by player_character.Owner_ID, player_character.Character_Name;

		SELECT gear.armor + player_character.armor AS armor_total
		INTO TempArm
		FROM player_character
		INNER JOIN equipped_gear
		ON player_character.Owner_ID = equipped_gear.User_ID AND equipped_gear.Character_Name = player_character.Character_Name
		INNER JOIN gear
		ON equipped_gear.Gear_ID = gear.Gear_ID
		WHERE Owner_ID = givenID AND Player_Character.Character_Name = givenName
		group by player_character.Owner_ID, player_character.Character_Name;

		SELECT gear.magic_resist + player_character.magic_resist AS magic_resist_total
		INTO TempMar
		FROM player_character
		INNER JOIN equipped_gear
		ON player_character.Owner_ID = equipped_gear.User_ID AND equipped_gear.Character_Name = player_character.Character_Name
		INNER JOIN gear
		ON equipped_gear.Gear_ID = gear.Gear_ID
		WHERE Owner_ID = givenID AND Player_Character.Character_Name = givenName
		group by player_character.Owner_ID, player_character.Character_Name;

		SELECT TempInt AS Intellect, TempStr AS Strength, TempAgi AS Agility, TempSta AS Stamina, TempArm AS Armor, TempMar AS Magic_Resist;
	END //

CREATE PROCEDURE GetCharacterNamesByID(IN userID INT)
	BEGIN
		SELECT Character_Name
		FROM player_character
		WHERE Owner_ID = userID;
	END //

CREATE PROCEDURE GetGearByType(IN type VARCHAR(16))
	BEGIN
		SELECT Gear_Name, Gear_Type, Intellect, Strength, Agility, Stamina, Armor, Magic_Resist
		FROM gear
		WHERE Gear_Type = type;
	END //

CREATE PROCEDURE GetGearNamesByType(IN type VARCHAR(16))
	BEGIN
		SELECT Gear_Name
		FROM gear
		WHERE Gear_Type = type;
	END //

CREATE PROCEDURE GetEnemiesByType(IN type VARCHAR(16))
	BEGIN
		SELECT Enemy_ID, Enemy_Name, Enemy_Type, Intellect, Strength, Agility, Stamina, Armor, Magic_Resist
		FROM Enemy
		WHERE Enemy_Type = type;
	END //

CREATE PROCEDURE GetEnemyNamesByType(IN type VARCHAR(16))
	BEGIN
		SELECT Enemy_Name
		FROM enemy
		WHERE Enemy_Type = type;
	END //

CREATE PROCEDURE AddCharacter(IN ownerID INT, IN charName VARCHAR(32), IN character_level INT, IN character_class VARCHAR(128), IN intellect INT, IN strength INT, IN agility INT, IN stamina INT, IN armor INT, IN magic_resist INT)
	BEGIN
		INSERT INTO player_character
		(Owner_ID, Character_Name, Character_Level, Character_Class, Intellect, Strength, Agility, Stamina, Armor, Magic_Resist)
		VALUES
		(ownerID, name, character_level, character_class, intellect, strength, agility, stamina, armor, magic_resist);
	END //

CREATE PROCEDURE EditCharacter(IN newCharName VARCHAR(32), IN oldCharName VARCHAR(32), IN charLevel INT, IN charClass VARCHAR(16), IN intellect INT, IN strength INT, IN agility INT, IN stamina INT, IN armor INT, IN magicResist INT)
	BEGIN
		UPDATE player_character
		SET	Character_Name = newCharName,
			Character_Level = charLevel,
			Character_Class = charClass,
			Intellect = intellect,
			Strength = strength,
			Agility = agility,
			Stamina = stamina,
			Armor = armor,
			Magic_Resist = magicResist
		WHERE Character_Name = oldCharName;
	END //

CREATE PROCEDURE DeleteCharacter(IN userID INT, IN character_name VARCHAR(32))
	BEGIN	
		DELETE FROM Member
		WHERE Active_Character = character_name AND User_ID = userID;

		DELETE FROM Equipped_gear
		WHERE User_ID = ownerID AND Player_Character.Character_Name = character_name;

		DELETE FROM Player_character
		WHERE Player_Character.Owner_ID = userID AND Player_Character.Character_Name = character_name;
	END //

CREATE PROCEDURE CreateTeam(IN teamID INT, IN teamName VARCHAR(64), IN ownerID INT)
	BEGIN
		INSERT INTO team
		(Team_ID, Team_Name, Owner_ID)
		VALUES
		(teamID, teamName, ownerID);
	END //

CREATE PROCEDURE JoinTeam(IN teamID INT, IN userID INT, IN characterName VARCHAR(32))
	BEGIN
		INSERT INTO member
		(Team_ID, User_ID, Active_Character)
		VALUES
		(teamID, userID, characterName);
	END //

CREATE PROCEDURE EditTeamName(IN oldTeamName VARCHAR(64), IN newTeamName VARCHAR(64))
	BEGIN
		UPDATE team
		SET Team_Name = newTeamName
		WHERE Team_Name = oldTeamName;
	END //

CREATE PROCEDURE EditTeamOwner(IN newOwnerID INT, IN oldOwnerID INT, IN teamID INT)
	BEGIN
		UPDATE team
		SET Owner_ID = newOwnerID
		WHERE Owner_ID = oldOwnerID AND Team_ID = teamID;
	END //

CREATE PROCEDURE RemoveTeamMember(IN teamID INT, IN charName VARCHAR(32))
	BEGIN
		DELETE FROM member
		WHERE Team_ID = teamID AND Active_Character = charName;
	END //

CREATE PROCEDURE DeleteTeam(IN teamName VARCHAR(64))
	BEGIN
		DELETE Member
		FROM Member
		INNER JOIN Team ON Member.Team_ID = Team.Team_ID
		WHERE Team.Team_Name = teamName;

		DELETE FROM Team
		WHERE Team_Name = teamName;
	END //

DELIMITER ;