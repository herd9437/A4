json.extract! activity, :id, :name, :description, :start_date, :end_date, :created_at, :updated_at
json.url activity_url(activity, format: :json)
