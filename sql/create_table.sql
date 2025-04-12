-- Users --
CREATE TABLE Users (
    User_ID INT PRIMARY KEY AUTO_INCREMENT,
    Email VARCHAR(255) NOT NULL,
    User_name VARCHAR(50) NOT NULL,
    Password_hash VARCHAR(255) NOT NULL,
    PFP_URL VARCHAR(255)
);
-- Admin --
CREATE TABLE Admins (
    Admin_ID INT PRIMARY KEY AUTO_INCREMENT,
    User_ID INT NOT NULL,
    FOREIGN KEY (User_ID) REFERENCES Users(User_ID)
);
-- Student --
CREATE TABLE Student (
    Student_ID INT PRIMARY KEY AUTO_INCREMENT,
    User_ID INT NOT NULL,
    Student_status ENUM('active', 'banned'),
    FOREIGN KEY (User_ID) REFERENCES Users(User_ID)
);
-- Test --
CREATE TABLE Test (
    Test_ID INT PRIMARY KEY AUTO_INCREMENT,
    Test_name VARCHAR(50) NOT NULL,
    Time_allowed INT, -- This is minutes
    Category VARCHAR(50) NOT NULL,
    Admin_ID INT NOT NULL,
    FOREIGN KEY (Admin_ID) REFERENCES Admins(Admin_ID),
    descriptions text
);
-- Question --
CREATE TABLE Question (
    Question_ID INT PRIMARY KEY AUTO_INCREMENT,
    Question_name TEXT NOT NULL,
    Category VARCHAR(50),
    Question_URL VARCHAR(255),
    Admin_ID INT NOT NULL,
    FOREIGN KEY (Admin_ID) REFERENCES Admins(Admin_ID)
);
-- Relationship test have questions --
CREATE TABLE TestQuestions (
    Test_ID INT NOT NULL,
    Question_ID INT NOT NULL,
    PRIMARY KEY (Test_ID, Question_ID),
    FOREIGN KEY (Test_ID) REFERENCES Test(Test_ID) ON DELETE CASCADE,
    FOREIGN KEY (Question_ID) REFERENCES Question(Question_ID) ON DELETE CASCADE
);
-- Options --
CREATE TABLE Choice (
    Question_ID INT NOT NULL,
    Choice_Number INT NOT NULL,
    Content TEXT NOT NULL,
    Is_answer BOOLEAN,
    PRIMARY KEY (Question_ID, Choice_Number),
    FOREIGN KEY (Question_ID) REFERENCES Question(Question_ID) ON DELETE CASCADE
);
-- Test attempt --
CREATE TABLE Test_Attempt (
    Attempt_ID INT PRIMARY KEY AUTO_INCREMENT,
    Test_ID INT NOT NULL,
    Student_ID INT NOT NULL,
    Score int NOT NULL,
    Attempt_Date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (Test_ID) REFERENCES Test(Test_ID),
    FOREIGN KEY (Student_ID) REFERENCES Student(Student_ID)
);

-- Questions attempt --
CREATE TABLE Question_Attempt (
    Question_Attempt_ID INT PRIMARY KEY AUTO_INCREMENT,
    Attempt_ID INT NOT NULL,
    Question_ID INT NOT NULL,
    Choice_Number INT NOT NULL,
    Is_correct BOOLEAN,
    FOREIGN KEY (Attempt_ID) REFERENCES Test_Attempt(Attempt_ID),
    FOREIGN KEY (Question_ID, Choice_Number) REFERENCES Choice(Question_ID, Choice_Number) ON DELETE CASCADE
);

-- Contact --
CREATE TABLE Contact (
    Contact_ID INT PRIMARY KEY AUTO_INCREMENT,
    Email VARCHAR(255) NOT NULL,
    Title VARCHAR(255),
    Messages TEXT,
    Contact_Date DATETIME DEFAULT CURRENT_TIMESTAMP
);
