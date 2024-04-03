package com.rangga.aplikasita

import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import android.widget.ImageView
import android.widget.TextView
import androidx.recyclerview.widget.RecyclerView

class BarangAdapter(
    val result: ArrayList<BarangModel.Data>,
    val listener : OnAdapterListener
    ) : RecyclerView.Adapter<BarangAdapter.ViewHolder>(){
    override fun onCreateViewHolder(parent: ViewGroup, viewType: Int) = ViewHolder(
        LayoutInflater.from(parent.context)
            .inflate(R.layout.adapter_barang, parent, false)
    )

    override fun onBindViewHolder(holder: BarangAdapter.ViewHolder, position: Int) {
        val data = result[position]
        holder.textBarang.text = data.nama_barang
        holder.textBarangstok.text = data.stok_barang
        holder.itemView.setOnClickListener{
            listener.onUpdate( data )

        }
        holder.imageDelete.setOnClickListener {
            listener.onDelete( data )
        }
    }

    override fun getItemCount() = result.size

    class ViewHolder(view : View): RecyclerView.ViewHolder(view){
        val textBarang = view.findViewById<TextView>(R.id.text_nambar)
        val textBarangstok = view.findViewById<TextView>(R.id.text_stokbar)
        val imageDelete = view.findViewById<ImageView>(R.id.image_delete)

    }

    public fun setData(data: List<BarangModel.Data>){
        result.clear()
        result.addAll(data)
        notifyDataSetChanged()
    }

    interface OnAdapterListener{
        fun onUpdate(barang : BarangModel.Data)
        fun onDelete(barang : BarangModel.Data)
    }

}