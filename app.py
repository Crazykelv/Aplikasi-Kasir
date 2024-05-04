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

cursorkuh.execute("DESCRIBE Orang")

for x in cursorkuh:
    print(x)

