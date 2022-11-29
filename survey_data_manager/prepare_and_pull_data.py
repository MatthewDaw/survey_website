from clarifai_grpc.grpc.api import service_pb2, resources_pb2
from clarifai_grpc.grpc.api.status import status_code_pb2

import mysql.connector
import json

YOUR_CLARIFAI_API_KEY = "07261570e02b4e96846724a6a284c766"
YOUR_APPLICATION_ID = "survey-app"
SAMPLE_URL = "https://samples.clarifai.com/metro-north.jpg"

from clarifai_grpc.channel.clarifai_channel import ClarifaiChannel
from clarifai_grpc.grpc.api import service_pb2_grpc

class image_url_converter:
    def __init__(self):
        self.stub = service_pb2_grpc.V2Stub(ClarifaiChannel.get_grpc_channel())
        self.metadata = (("authorization", f"Key {YOUR_CLARIFAI_API_KEY}"),)

    def convert_url(self, url):
        request = service_pb2.PostModelOutputsRequest(
            # This is the model ID of a publicly available General model. You may use any other public or custom model ID.
            model_id="general-image-recognition",
            user_app_id=resources_pb2.UserAppIDSet(app_id=YOUR_APPLICATION_ID),
            inputs=[
                resources_pb2.Input(
                    data=resources_pb2.Data(image=resources_pb2.Image(url=url))
                )
            ],
        )
        response = self.stub.PostModelOutputs(request, metadata=self.metadata)

        if response.status.code != status_code_pb2.SUCCESS:
            print(response)
            raise Exception(f"Request failed, status code: {response.status}")
        result_dictionary = {}
        for concept in response.outputs[0].data.concepts:
            result_dictionary[concept.name] = concept.value
        return result_dictionary

def insert_user_responses(mycursor, user_responses):
    key_check = {
        "1": ['norway_familiarity', 'sweeden_familiarity', 'findland_familiarity'],
        "6": ['how_relivant_eating_in_norway', 'how_highly_regard', 'how_frequently_eating_in_norway'],
        '7': ['contemporary', 'cheerful', 'leader', 'real', 'upper_class', 'spirited', 'excited', 'glamorous',
              'up_to_date', 'secure', 'tough', 'western', 'imaginative', 'technical', 'small_town', 'honest', 'unique',
              'smooth', 'wholesome'],
        '8': ['gender_select', 'age_range', 'nationality_select', 'marital_status_select', 'job_status', 'income']
    }
    for mturk_id, user_responses in user_responses.items():
        good_to_add = True
        for key_number_to_ckeck, list_of_value_names in key_check.items():
            if key_number_to_ckeck not in user_responses.keys():
                good_to_add = False
            else:
                for key_set in list_of_value_names:
                    if key_set not in user_responses[key_number_to_ckeck].keys():
                        good_to_add = False
            if not good_to_add:
                break

        if good_to_add:
            # delete_sql = f"DELETE FROM `survey_results` WHERE `mturk_id`='{mturk_id}' "
            # mycursor.execute(delete_sql)
            # sql = f"-- INSERT INTO `survey_results`(`mturk_id`, `norway_familiarity`, `sweeden_familiarity`, `findland_familiarity`, `how_relivant_eating_in_norway`, `how_highly_regard`, `how_frequently_eating_in_norway`, `contemporary`, `cheerful`, `leader`, `real`, `upper_class`, `spirited`, `excited`, `glamorous`, `up_to_date`, `secure`, `tough`, `western`, `imaginative`, `technical`, `small_town`, `honest`, `unique`, `smooth`, `wholesome`, `gender_select`, `age_range`, `nationality_select`, `marital_status_select`, `job_status`, `income`) VALUES ( '{mturk_id}','{user_responses['1']['norway_familiarity']}','{user_responses['1']['sweeden_familiarity']}','{user_responses['1']['findland_familiarity']}','{user_responses['6']['how_relivant_eating_in_norway']}','{user_responses['6']['how_highly_regard']}','{user_responses['6']['how_frequently_eating_in_norway']}','{user_responses['7']['contemporary']}','{user_responses['7']['cheerful']}','{user_responses['7']['leader']}','{user_responses['7']['real']}','{user_responses['7']['upper_class']}','{user_responses['7']['spirited']}','{user_responses['7']['excited']}','{user_responses['7']['glamorous']}','{user_responses['7']['up_to_date']}','{user_responses['7']['secure']}','{user_responses['7']['tough']}','{user_responses['7']['western']}','{user_responses['7']['imaginative']}','{user_responses['7']['technical']}','{user_responses['7']['small_town']}','{user_responses['7']['honest']}','{user_responses['7']['unique']}','{user_responses['7']['smooth']}','{user_responses['7']['wholesome']}','{user_responses['8']['gender_select']}','{user_responses['8']['age_range']}','{user_responses['8']['nationality_select']}','{user_responses['8']['marital_status_select']}','{user_responses['8']['job_status']}','{user_responses['8']['income']}')"

            sql = f"INSERT INTO `survey_results`(`mturk_id`, `norway_familiarity`, `sweeden_familiarity`, `findland_familiarity`, `how_relivant_eating_in_norway`, `how_highly_regard`, `how_frequently_eating_in_norway`, `contemporary`, `cheerful`, `leader`, `real`, `upper_class`, `spirited`, `excited`, `glamorous`, `up_to_date`, `secure`, `tough`, `western`, `imaginative`, `technical`, `small_town`, `honest`, `unique`, `smooth`, `wholesome`, `gender_select`, `age_range`, `nationality_select`, `marital_status_select`, `job_status`, `income`) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)"

            mycursor.execute(sql, ( mturk_id,user_responses['1']['norway_familiarity'], user_responses['1']['sweeden_familiarity'], user_responses['1']['findland_familiarity'], user_responses['6']['how_relivant_eating_in_norway'], user_responses['6']['how_highly_regard'], user_responses['6']['how_frequently_eating_in_norway'], user_responses['7']['contemporary'], user_responses['7']['cheerful'], user_responses['7']['leader'], user_responses['7']['real'], user_responses['7']['upper_class'], user_responses['7']['spirited'], user_responses['7']['excited'], user_responses['7']['glamorous'], user_responses['7']['up_to_date'], user_responses['7']['secure'], user_responses['7']['tough'], user_responses['7']['western'], user_responses['7']['imaginative'], user_responses['7']['technical'], user_responses['7']['small_town'], user_responses['7']['honest'], user_responses['7']['unique'], user_responses['7']['smooth'], user_responses['7']['wholesome'], user_responses['8']['gender_select'], user_responses['8']['age_range'], user_responses['8']['nationality_select'], user_responses['8']['marital_status_select'], user_responses['8']['job_status'], user_responses['8']['income']))

def get_image_data(image_url, stub, metadata):
    request = service_pb2.PostModelOutputsRequest(
        # This is the model ID of a publicly available General model. You may use any other public or custom model ID.
        model_id="general-image-recognition",
        user_app_id=resources_pb2.UserAppIDSet(app_id=YOUR_APPLICATION_ID),
        inputs=[
            resources_pb2.Input(
                data=resources_pb2.Data(image=resources_pb2.Image(url=image_url))
            )
        ],
    )
    image_result = {}
    response = stub.PostModelOutputs(request, metadata=metadata)
    for concept in response.outputs[0].data.concepts:
        image_result[concept.name] = concept.value
    return image_result

def get_image_captions(mycursor, user_responses):
    stub = service_pb2_grpc.V2Stub(ClarifaiChannel.get_grpc_channel())
    metadata = (("authorization", f"Key {YOUR_CLARIFAI_API_KEY}"),)
    for user_id, value in user_responses.items():
        delete_sql = f"DELETE FROM `collage_data` WHERE `mturk_id`='{user_id}' "
        mycursor.execute(delete_sql)
        if '5' in value.keys():
            for image_url, image_meta_data in value['5'].items():
                if "collage_name" in value['5'].keys() and "collage_description" in value['5'].keys():
                    collage_name = value['5']["collage_name"]
                    collage_description = value['5']["collage_description"]
                    if image_url != "collage_name":
                        data_response = get_image_data(image_url, stub, metadata)
                        for image_key, tag_probability in data_response.items():
                            sql = f"INSERT INTO `collage_data` (`mturk_id`, `collage_name`, `collage_description`, `image_url`, `search_term`, `time_to_add_image`, `image_tag`, `tag_probability`) VALUES (%s, %s, %s, %s, %s, %s, %s, %s) "
                            mycursor.execute(sql, (user_id, collage_name, collage_description, image_url, image_meta_data[0], image_meta_data[1], image_key, tag_probability))


def fetch_table_data(table_name, cursor):
    cursor.execute('select * from ' + table_name)

    header = [row[0] for row in cursor.description]

    rows = cursor.fetchall()

    return header, rows

def export(table_name, cursor):
    header, rows = fetch_table_data(table_name, cursor)

    # Create csv file
    f = open(table_name + '.csv', 'w')

    # Write header
    f.write(','.join(header) + '\n')

    for row in rows:
        f.write(','.join(str(r) for r in row) + '\n')

    f.close()
    print(str(len(rows)) + ' rows written successfully to ' + f.name)



if __name__ == '__main__':
    mydb = mysql.connector.connect(
        host="mysql.gb.stackcp.com",
        port=59618,
        user="main_user-4caa",
        password="asdf134dsg",
        database="survey_website-353030369582"
    )
    mycursor = mydb.cursor()
    mycursor.execute("SELECT mturkID FROM user_responses WHERE  mturkID NOT IN (SELECT mturk_id FROM survey_results) ")
    # mycursor.execute("SELECT mturkID FROM user_responses  ")
    myresult = mycursor.fetchall()
    usser_responses = {}
    collage_responses = {}

    for x in myresult:
        mturk_id = x[0]
        mycursor.execute("SELECT userResponses FROM user_responses WHERE mturkID='"+mturk_id+"'")
        my_new_result = mycursor.fetchall()
        if len(my_new_result):
            if len(my_new_result[0]):
                json_user_response = json.loads(my_new_result[0][0])
                collage_responses[mturk_id] = json_user_response
    insert_user_responses(mycursor, collage_responses)
    get_image_captions(mycursor, collage_responses)
    export("survey_results", mycursor)
    export("collage_data", mycursor)
    export("mturk_ids", mycursor)
    mydb.commit()
