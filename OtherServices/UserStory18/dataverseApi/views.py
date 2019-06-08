# from django.http import  HttpResponse
from django.shortcuts import render
from pyDataverse.api import Api


# Create your views here.
def home_view(request,*args,**kwargs):
    if request.method == "POST":

        base_url = 'https://demo.dataverse.org'
        api_token = "bcd0d879-592d-425f-9547-a112eb367c17"
        api = Api(base_url,api_token=api_token)
        name = request.POST.get("dataverse")
        identifier = request.POST.get("identifier")
        dataverseType = request.POST.get("dataverseType")

        email = request.POST.get("email")
        metaData= '''{
          "name": "'''+name+'''",
          "alias": "'''+identifier+'''",
          "dataverseContacts":  [
            {
              "contactEmail": "'''+email+'''"
            }
          ]
        }'''
        response = api.create_dataverse(identifier="khaled",metadata=metaData,auth=True)
        print(response.status_code)
    return  render(request,"home.html",{})