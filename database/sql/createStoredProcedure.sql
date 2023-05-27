DELIMITER $$
CREATE PROCEDURE insert_user_student(
IN first_name VARCHAR(255),
IN last_name VARCHAR(255),
IN middle_name VARCHAR(255),
IN address VARCHAR(255),
IN description VARCHAR(255),
IN type VARCHAR(255),
IN position VARCHAR(255),
IN birthdate DATE,
IN email VARCHAR(255),
IN category VARCHAR(255),
IN creator_id INT,
IN number_of_times_update INT
)
BEGIN
	INSERT INTO users(first_name, last_name,middle_name,address,description,type,position, birthdate ,email, category, creator_id, number_of_times_update, password) 
    VALUES(first_name, last_name,middle_name,address,description,type,position, birthdate ,email, category, creator_id, number_of_times_update, '');
END $$
DELIMITER ;