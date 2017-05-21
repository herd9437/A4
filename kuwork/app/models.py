from django.db import models

class Activity (models.Model):
  name = models.CharField(max_length=255)
  coordinator_email = models.CharField(max_length=255)
  description = models.CharField(max_length=1023)
  start_date = models.DateTimeField('date started')
  end_date = models.DateTimeField('date ended')
  #activity.ForeignKey(Activity, on_delete=models.CASCADE)
  #coordinator.ForeignKey(Student, on_delete=models.CASCADE)

class address (models.Model):
  address_id = models.IntegerField(default=0)
  street = models.CharField(max_length=255)
  city = models.CharField(max_length=255)
  state = models.CharField(max_length=255)
  zip_code = models.CharField(max_length=16)

class company (models.Model):
  comp_name = models.CharField(max_length=255)
  description = models.CharField(max_length=1023)
  #address.ForeignKey(Address, on_delete=models.CASCADE)

class student (models.Model):
  email = models.CharField(max_length=255)
  phone_number = models.CharField(max_length=255)
  name = models.CharField(max_length=255)
  degree = models.CharField(max_length=255)
  major = models.CharField(max_length=255)
  class_standing = models.CharField(max_length=255)
  #company.ForeignKey(Company, on_delete=models.CASCADE)
  #residence.ForeignKey(Residence, on_delete=models.CASCADE)

class residence (models.Model):
  landlord_email = models.CharField(max_length=255)
  landlord_phone_num = models.CharField(max_length=255)
  rent = models.CharField(max_length=255)
  address_id = models.IntegerField(default=0)
  residence_reviews = models.CharField(max_length=10000)
#  residence_image  = models.             blob,
  #address.ForeignKey(Address, on_delete=models.CASCADE)

class vehicle (models.Model):
  vin_number = models.IntegerField(default=0)
  make = models.CharField(max_length=255)
  model = models.CharField(max_length=255)
  capacity = models.IntegerField(default=0)
  #owner.ForeignKey(Student, on_delete=models.CASCADE)
