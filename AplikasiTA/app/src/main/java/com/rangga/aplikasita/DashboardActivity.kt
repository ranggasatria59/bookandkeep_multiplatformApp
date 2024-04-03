package com.rangga.aplikasita

import android.content.Intent
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.widget.Button

class DashboardActivity : AppCompatActivity() {
    private lateinit var permintaan : Button
    private lateinit var dipinjam : Button
    private lateinit var databrg : Button
    private lateinit var barangpengembalian : Button
    private lateinit var barangselesai : Button
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_dashboard)
        setupView()
        setupListener()
    }
    private fun setupView(){
        permintaan = findViewById(R.id.permintaan)
        dipinjam = findViewById(R.id.barangpinjam)
        databrg = findViewById(R.id.databarang)
        barangpengembalian = findViewById(R.id.barangpengembalian)
        barangselesai = findViewById(R.id.list_transaksi)
    }

    private fun setupListener(){
        permintaan.setOnClickListener{
            startActivity(Intent(this, PermintaanActivity::class.java))
        }
        dipinjam.setOnClickListener{
            startActivity(Intent(this,BarangPinjamActivity::class.java))
        }
        databrg.setOnClickListener{
            startActivity(Intent(this,MainActivity::class.java))
        }
        barangpengembalian.setOnClickListener{
            startActivity(Intent(this,PermintaanKembaliActivity::class.java))
        }
        barangselesai.setOnClickListener{
            startActivity(Intent(this,TransaksiActivity::class.java))
        }
    }
}