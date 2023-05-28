DELIMITER //
CREATE TRIGGER before_deleting_user
BEFORE DELETE ON users
FOR EACH ROW
BEGIN
    -- Perform the insert operation into the other table
    DECLARE user_id INT;
    DECLARE who_create_id INT;
    SET user_id = OLD.id;
    SET who_create_id = OLD.creator_id;
    INSERT INTO user_histories_action (user_id, who_change_id, action, created_at, updated_at)
    VALUES (user_id, who_create_id, 'DELETE',CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);
END //
DELIMITER ;

 -- DROP TRIGGER before_deleting_user;