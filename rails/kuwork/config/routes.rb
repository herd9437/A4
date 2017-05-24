Rails.application.routes.draw do
  get 'home/dashboard'

  resources :activities
  resources :companies
  resources :reviews
  resources :residences
  resources :vehicles
  resources :students
  resources :addresses
  # For details on the DSL available within this file, see http://guides.rubyonrails.org/routing.html
end
