package com.rangga.aplikasita

import android.content.Intent
import android.os.Bundle
import android.util.Log
import android.widget.Button
import android.widget.Toast
import androidx.appcompat.app.AppCompatActivity
import androidx.recyclerview.widget.RecyclerView
import com.google.android.material.floatingactionbutton.FloatingActionButton
import kotlinx.android.synthetic.main.activity_main.*
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response

class MainActivity : AppCompatActivity() {
    private val api by lazy { ApiRetrofit().endpoint }
    private lateinit var barangAdapter : BarangAdapter
    private lateinit var listBarang : RecyclerView
    private lateinit var fabcreate : FloatingActionButton
    private lateinit var gambar : Button

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_main)
        supportActionBar?.title = "Data Barang"
        setupView()
        setupList()
        setupListener()
    }

    override fun onStart(){
        super.onStart()
        getBarang()
    }

    private fun setupView(){
        listBarang = findViewById(R.id.list_barang)
        fabcreate = findViewById(R.id.fab_create)
    }

    private fun setupListener(){
        fabcreate.setOnClickListener{
            startActivity(Intent(this, CreateActivity::class.java))
        }
    }

    private fun setupList(){
        barangAdapter = BarangAdapter(arrayListOf(),object : BarangAdapter.OnAdapterListener{
            override fun onUpdate(barang: BarangModel.Data) {
                startActivity(
                    Intent(this@MainActivity, EditBarangActivity::class.java)
                        .putExtra("nama_barang", barang)
                        .putExtra("stok_barang",barang)
                )
            }

            override fun onDelete(barang: BarangModel.Data) {
                api.delete(barang.id_barang!!)
                    .enqueue(object : Callback<SubmitModel>{
                        override fun onResponse(
                            call: Call<SubmitModel>,
                            response: Response<SubmitModel>
                        ) {
                            if(response.isSuccessful){
                                val submit = response.body()
                                Toast.makeText(applicationContext,submit!!.message,Toast.LENGTH_SHORT).show()
                                getBarang()
                            }
                        }

                        override fun onFailure(call: Call<SubmitModel>, t: Throwable) {
                        }

                    })
            }


        })
        listBarang.adapter = barangAdapter

    }

    private fun getBarang(){
        api.data().enqueue(object : Callback<BarangModel>{
            override fun onResponse(call: Call<BarangModel>, response: Response<BarangModel>) {
                if(response.isSuccessful){
                    val listData = response.body()!!.result
                    barangAdapter.setData( listData )

  //                  listData.forEach({
    //                    Log.e("MainActivity", "barang ${it.nama_barang}")
       //             })
                }

            }

            override fun onFailure(call: Call<BarangModel>, t: Throwable) {
                Log.e("MainActivity", t.toString())
            }

        })
    }

}