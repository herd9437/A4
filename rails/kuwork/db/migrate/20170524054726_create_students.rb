class CreateStudents < ActiveRecord::Migration[5.0]
  def change
    create_table :students do |t|
      t.string :first_name
      t.string :last_name
      t.string :email_address
      t.string :phone_number
      t.string :class_standing
      t.string :major
      t.string :degree

      t.timestamps
    end
  end
end
