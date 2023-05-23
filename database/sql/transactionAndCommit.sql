START TRANSACTION;
UPDATE users
SET first_name = 'catherine transaction'
WHERE id = 10;
COMMIT;