DELIMITER //

CREATE PROCEDURE incrementNumberOfUpdates(IN numberofupdates INT, OUT result INT)
BEGIN
    SET result = numberofupdates + 1;
END //

DELIMITER ;
