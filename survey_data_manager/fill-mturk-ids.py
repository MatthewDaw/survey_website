import mysql.connector
import pandas as pd
import uuid
import pymysql
from sqlalchemy import create_engine



if __name__ == '__main__':
    engine = create_engine("mysql+pymysql://{user}:{pw}@mysql.gb.stackcp.com:59618/{db}"
                           .format(user="main_user-4caa",
                                   pw="asdf134dsg",
                                   db="survey_website-353030369582"))

    data = pd.DataFrame({"mturk_ids": [str(uuid.uuid4()) for _ in range(20000)]})

    data.to_csv("mturk_ids.csv", index=False)

    data.to_sql('mturk_ids', con=engine, if_exists='append', chunksize=1000)

    # connection = pymysql.connect(host="localhost",
    #                        user="root",
    #                        passwd="",
    #                        db="survey_website",
    #                        charset='utf8')
    #
    # cursor = connection.cursor()
    #
    # sql = "INSERT INTO "
    #
    # # cursor = mydb.cursor()
    # # print(mydb)
    #
    # mturk_ids = pd.DataFrame({ "mturk_ids":[str(uuid.uuid4()) for _ in range(20000)]})
    #
    # mturk_ids.to_sql(con=conn, name='mturk_ids', if_exists='replace')
    #
    #
    #
    #
