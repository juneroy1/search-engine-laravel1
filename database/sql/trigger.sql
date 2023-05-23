CREATE TRIGGER before_number_times_update
BEFORE UPDATE ON users
FOR EACH ROW
SET NEW.number_of_times_update = OLD.number_of_times_update + 1;

SHOW TRIGGERS;