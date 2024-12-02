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

  if (loading) return <div></div>;
  if (error) return <div>{error}</div>;

  const addProduits = () => {
    alert(``);
  };

  const updateProduits = () => {
    alert(``);
  };

  const deleteProduits = () => {
    alert(``);
  };

  return (
    <><div className="flex justify-end mb-4"><button className="add addProduits" onClick={() => addProduits()}><i className="pi pi-plus"style={{ fontSize: '1.4rem', marginRight:"0.7rem" }}/>Ajouter un produit</button></div>
    <DataTable className="DataTable DataTableProducts" value={products} filterDisplay="row" dataKey="id" paginator rows={5} loading={loading}>
          <Column field="id" header="Id" />
          <Column field="nom" header="Nom" filter filterPlaceholder="Nom du produit" />
          <Column field="description" header="Description" />
          <Column field="prix" header="Prix" body={(rowData) => rowData.prix + "€"} />
          <Column header="Catégorie" body={(rowData) => rowData.categorie && rowData.categorie.nom ? rowData.categorie.nom : 'Aucune catégorie'} />
          <Column field="dateCreation" header="Date de création" body={(rowData) => new Date(rowData.dateCreation).toLocaleDateString("fr-FR")} />
          <Column header="" body={(rowData) => (<button className="updateButton" onClick={() => updateProduits()}><i className="pi pi-pencil" style={{ fontSize: '1.5rem' }}></i></button>)} />
          <Column header="" body={(rowData) => (<button className="deleteButton" onClick={() => deleteProduits()}><i className="pi pi-trash" style={{ fontSize: '1.5rem' }}></i></button>)} />
      </DataTable></>
  );
};

export default ProductTable;


