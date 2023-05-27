DELIMITER $$
CREATE PROCEDURE update_user_student(
IN userId INT,
IN first_name VARCHAR(255),
IN last_name VARCHAR(255),
IN middle_name VARCHAR(255),
IN address VARCHAR(255),
IN description VARCHAR(255),
IN type VARCHAR(255),
IN position VARCHAR(255),
IN birthdate DATE,
IN category VARCHAR(255),
IN creator_id INT,
IN newEmail VARCHAR(255)
)
BEGIN
	UPDATE users SET first_name = first_name, last_name = last_name, 
    middle_name = middle_name, 
    address = address, 
	description = description, 
    type = type, 
    position = position, 
    birthdate = birthdate,
    category = category,
    creator_id = creator_id,
    email = newEmail
    WHERE id = userId
    ;
END $$
DELIMITER ;