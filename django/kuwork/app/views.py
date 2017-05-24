import json
from django.core.serializers.json import DjangoJSONEncoder

from django.shortcuts import render
from django.http import HttpResponse
from django.template.response import TemplateResponse

from app.models import Activity
from app.models import Address
from app.models import Company
from app.models import Student
from app.models import Residence
from app.models import Vehicle

# Create your views here.
def index(request):
    response = TemplateResponse(request, 'index.html', {})
    return response

def students(request):
        dictionaries = [ obj.as_dict() for obj in Student.objects.all() ]
        return HttpResponse(json.dumps({"data": dictionaries}), content_type='application/json')

def companies(request):
        dictionaries = [ obj.as_dict() for obj in Company.objects.all() ]
        return HttpResponse(json.dumps({"data": dictionaries}), content_type='application/json')

def residencies(request):
        dictionaries = [ obj.as_dict() for obj in Residence.objects.all() ]
        return HttpResponse(json.dumps({"data": dictionaries}), content_type='application/json')

def activities(request):
        dictionaries = [ obj.as_dict() for obj in Activity.objects.all() ]
        return HttpResponse(json.dumps({"data": dictionaries}), content_type='application/json')
