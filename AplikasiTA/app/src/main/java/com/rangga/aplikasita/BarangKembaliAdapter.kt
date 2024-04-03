package com.rangga.aplikasita

import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import android.widget.Button
import android.widget.ImageView
import android.widget.TextView
import androidx.recyclerview.widget.RecyclerView

class BarangKembaliAdapter (
    val result: ArrayList<PinjamModel.Data>,
    val listener : OnAdapterListener
    ): RecyclerView.Adapter<BarangKembaliAdapter.ViewHolder>(){
        override fun onCreateViewHolder(parent: ViewGroup, viewType: Int) = ViewHolder(
            LayoutInflater.from(parent.context)
                .inflate(R.layout.adapter_barang_kembali, parent, false)
        )

    override fun onBindViewHolder(holder: ViewHolder, position: Int) {
        val pengembalian = result[position]
        holder.textNamaBarang_kembali.text = pengembalian.nama_barang
        holder.textNamaPeminjam_kembali.text = pengembalian.peminjam
        holder.telponpinjam_kembali.text = pengembalian.telpon
        holder.jmlbrgpinjam_kembali.text = pengembalian.jml_barang
        holder.tglbrgpinjam_kembali.text = pengembalian.tgl_pinjam
        holder.tglbrgkmbli_kembali.text = pengembalian.tgl_kembali
        holder.id_barang.text = pengembalian.id_barang
        holder.id_user.text = pengembalian.id_user
        holder.itemView.setOnClickListener{
            listener.onTerimaPengembalian( pengembalian )
        }
    }

        override fun getItemCount() = result.size

    class ViewHolder(view : View): RecyclerView.ViewHolder(view){
        val textNamaBarang_kembali = view.findViewById<TextView>(R.id.text_namabarangkembali)
        val textNamaPeminjam_kembali = view.findViewById<TextView>(R.id.text_namakembali)
        val telponpinjam_kembali = view.findViewById<TextView>(R.id.text_namalevelkembali)
        val jmlbrgpinjam_kembali = view.findViewById<TextView>(R.id.text_jmlbarangkembali)
        val tglbrgpinjam_kembali = view.findViewById<TextView>(R.id.text_tglbarangpinjamkembali)
        val tglbrgkmbli_kembali = view.findViewById<TextView>(R.id.text_tglbarangkembalii)
        val id_barang = view.findViewById<TextView>(R.id.text_id_barang)
        val id_user = view.findViewById<TextView>(R.id.text_id_user)
        val terimapinjam_kembali = view.findViewById<ImageView>(R.id.konfirmasikembali)
    }

        public fun setData(pengembalian: List<PinjamModel.Data>){
            result.clear()
            result.addAll(pengembalian)
            notifyDataSetChanged()
        }

    interface OnAdapterListener{
        fun onTerimaPengembalian(kembali : PinjamModel.Data)
    }

}
