import mysql.connector

db = mysql.connector.connect(
    host="localhost",
    user="root",
    passwd="1667",
    database="testdatabase"
    )

cursorkuh = db.cursor()

# cursorkuh.execute("CREATE TABLE Orang (name VARCHAR(50), umur smallint UNSIGNED, Id int PRIMARY KEY AUTO_INCREMENT)") 
# cursorkuh.execute("INSERT INTO Orang (name, umur) VALUES (%s,%s)", ("Fahri", 19))
# db.commit()

# cursorkuh.execute("SELECT id, name FROM Orang WHERE umur = 19 ORDER BY id DESC")

# cursorkuh.execute("ALTER TABLE Orang ADD COLUMN makanan VARCHAR(50) NOT NULL")
# cursorkuh.execute("ALTER TABLE Orang DROP makanan")

# cursorkuh.execute("DESCRIBE Orang")




# users = [("Crazykelv", "hasembuyah123"),
#          ("KIZAGAN", "killalltheway"),
#          ("XDAYI", "unclealltheway")]

# user_scores = [(67, 433),
#                (75, 460),
#                (80, 500)]

# Q1 = "CREATE TABLE Users (id int PRIMARY KEY AUTO_INCREMENT, name VARCHAR(50), passwd VARCHAR(50))"

# Q2 = "CREATE TABLE Scores (userId int PRIMARY KEY, FOREIGN KEY(userId) REFERENCES Users(id), game1 int DEFAULT 0, game2 int DEFAULT 0)"

# # cursorkuh.execute(Q2)
# Q3 = "INSERT INTO Users (name, passwd) VALUES (%s, %s)"
# Q4 = "INSERT INTO Scores (userId, game1, game2) VALUES (%s, %s, %s)"

# for x, user in enumerate(users):
#     cursorkuh.execute(Q3, user)
#     last_id = cursorkuh.lastrowid
#     cursorkuh.execute(Q4, (last_id,) + user_scores[x])

# db.commit()

# cursorkuh.execute("SELECT * FROM Users")
# for x in cursorkuh:
#     print(x)

# cursorkuh.execute("SELECT * FROM Scores")
# for x in cursorkuh:
#     print(x)