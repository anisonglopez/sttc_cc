<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(UnitsTableSeeder::class);
        $this->call(CompaniesTableSeeder::class);
        $this->call(MaterialGroupsTableSeeder::class);
        $this->call(MaterialsTableSeeder::class);
        $this->call(ModulesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(MenusTableSeeder::class);
        $this->call(LogsTableSeeder::class);
        $this->call(DepartmentsTableSeeder::class);
        $this->call(AssetgroupsTableSeeder::class);
        $this->call(AssetmodelsTableSeeder::class);
        $this->call(BusinessUnitTableSeeder::class);
        $this->call(BranchTableSeeder::class);
        $this->call(IntypeTableSeeder::class);
        $this->call(JobtypesTableSeeder::class);
        $this->call(OuttypesTableSeeder::class);
        $this->call(JobstatusesTableSeeder::class);
        $this->call(CheckinstatusesTableSeeder::class);
        $this->call(PrioritiesTableSeeder::class);
        $this->call(LocationsTableSeeder::class);
        $this->call(DepinbranchesTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(EmployeeTableSeeder::class);
        $this->call(RequesterTableSeeder::class);
        $this->call(M_StockTableSeeder::class);
        
        
        Model::reguard();
        // $this->call(UsersTableSeeder::class);
    }
}
