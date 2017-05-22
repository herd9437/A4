import json

from django.shortcuts import render

from django.http import HttpResponse
from django.template.response import TemplateResponse

# Create your views here.
def index(request):
    response = TemplateResponse(request, 'index.html', {})
    return response

def vehicles(request):
    if request.method == 'GET':
        response_data = {}
        response_data['result'] = 'error'
        response_data['message'] = 'Some error message'
        return HttpResponse(json.dumps(response_data), content_type="application/json")
    elif request.method == 'POST':
        response_data = {}
        response_data['result'] = 'error'
        response_data['message'] = 'Some error message'
        return HttpResponse(json.dumps(response_data), content_type="application/json")

def students(request):
    if request.method == 'GET':
        response_data = {}
        response_data['result'] = 'error'
        response_data['message'] = 'Some error message'
        return HttpResponse(json.dumps(response_data), content_type="application/json")
    elif request.method == 'POST':
        response_data = {}
        response_data['result'] = 'error'
        response_data['message'] = 'Some error message'
        return HttpResponse(json.dumps(response_data), content_type="application/json")

def companies(request):
    if request.method == 'GET':
        response_data = {}
        response_data['result'] = 'error'
        response_data['message'] = 'Some error message'
        return HttpResponse(json.dumps(response_data), content_type="application/json")
    elif request.method == 'POST':
        response_data = {}
        response_data['result'] = 'error'
        response_data['message'] = 'Some error message'
        return HttpResponse(json.dumps(response_data), content_type="application/json")
