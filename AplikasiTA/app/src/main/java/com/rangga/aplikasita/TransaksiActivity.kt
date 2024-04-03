package com.rangga.aplikasita

import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.util.Log
import androidx.recyclerview.widget.RecyclerView
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response

class TransaksiActivity : AppCompatActivity() {
    private val api by lazy { ApiRetrofit().endpoint }
    private lateinit var Transaksi_adapter: TransaksiAdapter
    private lateinit var list_transaksi : RecyclerView

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_transaksi)
        setupList()
    }

    override fun onStart(){
        super.onStart()
        getTransaksi()
    }

    private fun setupList(){
        list_transaksi = findViewById(R.id.list_transaksi)
        Transaksi_adapter= TransaksiAdapter(arrayListOf())
        list_transaksi.adapter = Transaksi_adapter
    }

    private fun getTransaksi(){
        api.transaksi_selesai().enqueue(object : Callback<PinjamModel> {
            override fun onResponse(call: Call<PinjamModel>, response: Response<PinjamModel>) {
                if(response.isSuccessful){
                    val listTransaksi = response.body()!!.result
                    Transaksi_adapter.setData(listTransaksi)
                }
            }

            override fun onFailure(call: Call<PinjamModel>, t: Throwable) {
                Log.e("TransaksiActivity", t.toString())
            }

        })
    }
}