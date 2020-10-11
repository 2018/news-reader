<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $class = User::class;
        $data = [
            [
                'id' => 1,
                'name' => 'admin',
                'password' => 'admin',
                'email' => 'admin@example.com',
            ],
        ];
        foreach ($data as $aData) {
            $model = new $class();
            if (!is_null($model1 = $model::find($aData['id']))) {
                $model = $model1;
            }
            $model->fill($aData);
            if (!$model->validate()) {
                $this->command->getOutput()->writeln("<error>Errors: </error>");
                dd($model->getErrors());
            } else {
                $model->save();
            }
        }
    }
}
