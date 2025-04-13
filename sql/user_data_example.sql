-- Step 1: Insert 5 users into the Users table with valid passwords
INSERT INTO Users (Email, UserName, Password_hash, PFP_URL)
VALUES
('user1@example.com', 'UserOne1', '$2y$10$f1M@.YHash3dPa$$w0rd1', '../images/account/user.png'),
('user2@example.com', 'UserTwo2', '$2y$10$f2M@.YHash3dPa$$w0rd2', '../images/account/user.png'),
('user3@example.com', 'UserThree3', '$2y$10$f3M@.YHash3dPa$$w0rd3', '../images/account/user.png'),
('user4@example.com', 'UserFour4', '$2y$10$f4M@.YHash3dPa$$w0rd4', '../images/account/user.png'),
('user5@example.com', 'UserFive5', '$2y$10$f5M@.YHash3dPa$$w0rd5', '../images/account/user.png');
('user6@example.com', 'UserSix6', '$2y$10$f5M@.YHash3dPa$$w0rd6', '../images/account/user.png');


-- admin
INSERT INTO Users (Email, User_name, Password_hash, PFP_URL)
VALUES
('admin1@example.com', 'AdminOne1', 'da1625f520080ea03e852cba65dbc118', '../images/account/admin.png'),
('admin2@example.com', 'AdminTwo2', '551bebf9d48563c04f839ca54a4f7823', '../images/account/admin.png'),

INSERT INTO Users (Email, User_name, Password_hash, PFP_URL)
VALUES
('admin1@example.com', 'AdminOne1', '$2y$10$f1M@.YHash3dPa$$w0rdAdmin1', '../images/account/admin.png'),
('admin2@example.com', 'AdminTwo2', '$2y$10$f1M@.YHash3dPa$$w0rdAdmin2', '../images/account/admin.png'),



-- https://md5calc.com/