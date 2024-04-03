package com.rangga.aplikasita

import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.util.Log
import androidx.recyclerview.widget.RecyclerView
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response

class BarangPinjamActivity : AppCompatActivity() {
    private val api by lazy { ApiRetrofit().endpoint }
    private lateinit var BarangDipinjam_Adapter: BarangDipinjamAdapter
    private lateinit var list_barangDipinjam : RecyclerView
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_barang_pinjam)
        setupList()
    }

    override fun onStart(){
        super.onStart()
        getBarangDipinjam()
    }

    private fun setupList(){
        list_barangDipinjam = findViewById(R.id.list_barangDipinjam)
        BarangDipinjam_Adapter= BarangDipinjamAdapter(arrayListOf())
        list_barangDipinjam.adapter = BarangDipinjam_Adapter
    }

    private fun getBarangDipinjam(){
        api.barangdipinjam().enqueue(object : Callback <PinjamModel>{
            override fun onResponse(call: Call<PinjamModel>, response: Response<PinjamModel>) {
                if(response.isSuccessful){
                    val listBarangpinjam = response.body()!!.result
                    BarangDipinjam_Adapter.setData(listBarangpinjam)
                }
            }

            override fun onFailure(call: Call<PinjamModel>, t: Throwable) {
                Log.e("BarangPinjamActivity", t.toString())
            }

        })
    }
}