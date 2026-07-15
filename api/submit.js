import supabase from "../lib/db.js";

function formatRupiah(angka) {
    return "Rp" + angka.toLocaleString("id-ID");
}

export default async function handler(req, res) {

    if (req.method !== "POST") {
        return res.status(405).json({
            success: false,
            message: "Method tidak diizinkan"
        });
    }

    try {

        const {
            nama,
            produk,
            hp,
            alamat,
            ukuran,
            pembayaran
        } = req.body;

        let subtotal = 0;

        if (produk === "Baju Fashion") {

            switch (ukuran) {
                case "K":
                    subtotal = 27000;
                    break;
                case "O":
                    subtotal = 28100;
                    break;
                case "S":
                    subtotal = 29200;
                    break;
                case "M":
                    subtotal = 33600;
                    break;
                case "L":
                    subtotal = 35800;
                    break;
                case "RMJ":
                    subtotal = 38000;
                    break;
            }

        } else if (produk === "Gaun Modern") {
            subtotal = 350000;
        } else if (produk === "Kerah Style") {
            subtotal = 75000;
        } else if (produk === "Bando Cantik") {
            subtotal = 15000;
        }

        const ongkir = 10000;
        const total = subtotal + ongkir;

        const { data, error } = await supabase
            .from("orders")
            .insert([{
                nama,
                produk,
                ukuran: ukuran || "-",
                hp,
                pembayaran,
                alamat,
                rating: 0
            }])
            .select()
            .single();

        if (error) throw error;

        res.status(200).json({
            success: true,
            id: data.id,
            subtotal: formatRupiah(subtotal),
            ongkir: formatRupiah(ongkir),
            harga: formatRupiah(total),
            message: "Pesanan berhasil disimpan"
        });

    } catch (err) {

        console.log(err);

        res.status(500).json({
            success: false,
            message: err.message
        });

    }

}
