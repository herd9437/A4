require 'test_helper'

class ResidencesControllerTest < ActionDispatch::IntegrationTest
  setup do
    @residence = residences(:one)
  end

  test "should get index" do
    get residences_url
    assert_response :success
  end

  test "should get new" do
    get new_residence_url
    assert_response :success
  end

  test "should create residence" do
    assert_difference('Residence.count') do
      post residences_url, params: { residence: { email: @residence.email, phone_number: @residence.phone_number, rent: @residence.rent } }
    end

    assert_redirected_to residence_url(Residence.last)
  end

  test "should show residence" do
    get residence_url(@residence)
    assert_response :success
  end

  test "should get edit" do
    get edit_residence_url(@residence)
    assert_response :success
  end

  test "should update residence" do
    patch residence_url(@residence), params: { residence: { email: @residence.email, phone_number: @residence.phone_number, rent: @residence.rent } }
    assert_redirected_to residence_url(@residence)
  end

  test "should destroy residence" do
    assert_difference('Residence.count', -1) do
      delete residence_url(@residence)
    end

    assert_redirected_to residences_url
  end
end
