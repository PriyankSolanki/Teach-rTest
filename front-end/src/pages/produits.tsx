import React, { useEffect, useState } from "react";
import { fetchProducts } from "./api/apiProduits";
import { DataTable } from 'primereact/datatable';
import { Column } from 'primereact/column';

const ProductTable = () => {
  const [products, setProducts] = useState([]);
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState<string | null>(null);
    
  useEffect(() => {
    const getProducts = async () => {
        try {
          const data = await fetchProducts();
          setProducts(data); 
          console.log(data);
          setLoading(false);
        } catch (err) {
          setError("Impossible de récupérer les produits.");
          setLoading(false);
        }
      };
      getProducts();
  }, []);

  if (loading) return <div>Chargement...</div>;
  if (error) return <div>{error}</div>;

  return (
    <><DataTable className="DataTable DataTableProducts" value={products} filterDisplay="row" dataKey="id" paginator rows={10} loading={loading}>
          <Column field="id" header="Id" />
          <Column field="nom" header="Nom" filter filterPlaceholder="Nom du produit" />
          <Column field="description" header="Description" />
          <Column field="prix" header="Prix" body={(rowData) => rowData.prix + "€"} />
          <Column header="Catégorie" body={(rowData) => rowData.categorie && rowData.categorie.nom ? rowData.categorie.nom : 'Aucune catégorie'} />
          <Column field="dateCreation" header="Date de création" body={(rowData) => new Date(rowData.dateCreation).toLocaleDateString("fr-FR")} />
          <Column header="Modifier" body={"Modifier"} />
          <Column header="Supprimer" body={"Supprimer"} />
      </DataTable></>
  );
};

export default ProductTable;


