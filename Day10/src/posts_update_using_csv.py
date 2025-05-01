import mysql.connector

# DBへ接続
conn = mysql.connector.connect(
    user='simple_blog_user',
    password='User!1234',
    host='udemy-aws-14days-mysql.cz0ey60y4t95.ap-northeast-1.rds.amazonaws.com',
    database='simple_blog',
    allow_local_infile=True
)

cursor = conn.cursor()

trancate_data_query = "TRUNCATE posts;"
cursor.execute(trancate_data_query)

load_data_query = "LOAD DATA LOCAL INFILE './data.csv' INTO TABLE posts fields terminated by ',';"
cursor.execute(load_data_query)

conn.commit()