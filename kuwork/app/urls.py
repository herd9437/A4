from django.conf.urls import url

from . import views

urlpatterns = [
    url(r'^$', views.index, name='index'),
    url(r'^students', views.students, name='students'),
    url(r'^companies', views.companies, name='companies'),
    url(r'^residencies', views.residencies, name='residencies'),
    url(r'^activities', views.activities, name='activities')
]
