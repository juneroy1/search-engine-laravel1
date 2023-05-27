DELIMITER //
CREATE PROCEDURE delete_user_student(IN userId INT)
BEGIN
    DELETE FROM users WHERE id = userId;
END //
DELIMITER ;