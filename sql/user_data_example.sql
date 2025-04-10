-- Step 1: Insert 5 users into the Users table with valid passwords
INSERT INTO Users (Email, UserName, Password_hash, PFP_URL)
VALUES
('user1@example.com', 'UserOne1', '$2y$10$f1M@.YHash3dPa$$w0rd1', '../images/account/user.png'),
('user2@example.com', 'UserTwo2', '$2y$10$f2M@.YHash3dPa$$w0rd2', '../images/account/user.png'),
('user3@example.com', 'UserThree3', '$2y$10$f3M@.YHash3dPa$$w0rd3', '../images/account/user.png'),
('user4@example.com', 'UserFour4', '$2y$10$f4M@.YHash3dPa$$w0rd4', '../images/account/user.png'),
('user5@example.com', 'UserFive5', '$2y$10$f5M@.YHash3dPa$$w0rd5', '../images/account/user.png');
