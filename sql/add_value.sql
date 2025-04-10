-- Step 1: Insert into the Users table
INSERT INTO Users (Email, UserName, Password_hash, PFP_URL)
VALUES ('admin@example.com', 'AdminUser', 'edf75388a52da377b7219540576efb12', '../images/account/user.png'); -- password is hashed_password

-- Step 2: Get the newly created User_ID
SET @NewUserID = LAST_INSERT_ID();

-- Step 3: Insert into the Admins table using the User_ID
INSERT INTO Admins (User_ID) VALUES (@NewUserID);
