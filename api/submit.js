import db from "../lib/db.js";

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

        let harga = "Rp0";

        if (produk === "Baju Fashion") {

            switch (ukuran) {
                case "K":
                    harga = "Rp27.000";
                    break;

                case "O":
                    harga = "Rp28.100";
                    break;

                case "S":
                    harga = "Rp29.200";
                    break;

                case "M":
                    harga = "Rp33.600";
                    break;

                case "L":
                    harga = "Rp35.800";
                    break;

                case "RMJ":
                    harga = "Rp38.000";
                    break;
            }

        } else if (produk === "Gaun Modern") {

            harga = "Rp350.000";

        } else if (produk === "Kerah Style") {

            harga = "Rp75.000";

        } else if (produk === "Bando Cantik") {

            harga = "Rp15.000";

        }

        const sql = `
        INSERT INTO orders
        (
            nama,
            produk,
            ukuran,
            hp,
            pembayaran,
            alamat,
            rating
        )
        VALUES
        (
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?
        )
        `;

        const [result] = await db.execute(sql, [
            nama,
            produk,
            ukuran || "-",
            hp,
            pembayaran,
            alamat,
            0
        ]);

        res.status(200).json({

            success: true,

            id: result.insertId,

            harga: harga,

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
