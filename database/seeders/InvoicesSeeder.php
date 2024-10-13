<?php

// database/seeders/InvoicesSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Invoice;

class InvoicesSeeder extends Seeder
{
    public function run()
    {
        Invoice::create(['customer_id' => 1, 'total' => 400000, 'invoice_date' => '2024-01-10']);
        Invoice::create(['customer_id' => 2, 'total' => 300000, 'invoice_date' => '2024-01-15']);
    }
}
