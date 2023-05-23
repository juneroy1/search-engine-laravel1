DELIMITER $$
CREATE PROCEDURE `list_of_users` ()
BEGIN
	SELECT * FROM users;
END;
DELIMITER;

-- CALL list_of_users();

-- call of user per id
DELIMITER $$
CREATE PROCEDURE find_user(IN userId INT)
BEGIN
	SELECT *
    FROM users
    WHERE id = userId;
END $$
DELIMITER ;

-- CALL find_user(10);
