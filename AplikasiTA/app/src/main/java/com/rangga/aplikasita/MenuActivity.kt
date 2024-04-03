package com.rangga.aplikasita

import android.content.Intent
import android.graphics.Color
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.view.View
import android.view.WindowManager
import android.widget.Button
import android.widget.LinearLayout

class MenuActivity : AppCompatActivity() {
    private lateinit var permintaan : LinearLayout
    private lateinit var dipinjam : LinearLayout
    private lateinit var databrg : LinearLayout
    private lateinit var barangpengembalian : LinearLayout
    private lateinit var barangselesai : LinearLayout
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_menu)
        supportActionBar?.hide()
        getWindow().setStatusBarColor(Color.TRANSPARENT);
        setupView()
        setupListener()
    }
    private fun setupView(){
        permintaan = findViewById(R.id.linearLayout2)
        dipinjam = findViewById(R.id.linearLayout3)
        databrg = findViewById(R.id.linearLayout6)
        barangpengembalian = findViewById(R.id.linearLayout4)
        barangselesai = findViewById(R.id.linearLayout5)
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