class CreateResidences < ActiveRecord::Migration[5.0]
  def change
    create_table :residences do |t|
      t.string :email
      t.string :phone_number
      t.string :rent

      t.timestamps
    end
  end
end
