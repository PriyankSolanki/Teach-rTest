import React, { useEffect, useState } from "react";
import { fetchProduits } from "../../api/apiProduits";
import { DataTable } from 'primereact/datatable';
import { Column } from 'primereact/column';

interface ProductTableProps {
  openAddDialog: () => void; 
  setProduits: (data:any) => void;
  produits:any[];
  openUpdateDialog: (produit:any) => void; 
  openDeleteDialog: (produit:any) => void;
}

const ProduitsTable : React.FC<ProductTableProps> = ({openDeleteDialog, openUpdateDialog,  openAddDialog, setProduits, produits }) => {
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState<string | null>(null);
    
  useEffect(() => {
    const getProduits = async () => {
        try {
          const data = await fetchProduits();
          setProduits(data); 
          setLoading(false);
        } catch (err) {
          setError("Impossible de récupérer les produits.");
          setLoading(false);
        }
      };
      getProduits();
  }, []);

  if (loading) return <div></div>;
  if (error) return <div>{error}</div>;

  return (
    <><div className="flex justify-end mb-4"><button className="add addProduits" onClick={openAddDialog}><i className="pi pi-plus"style={{ fontSize: '1.4rem', marginRight:"0.7rem" }}/>Ajouter un produit</button></div>
    <DataTable className="DataTable DataTableProducts" value={produits} filterDisplay="row" dataKey="id" paginator rows={5} loading={loading}>
          <Column field="id" header="Id" />
          <Column field="nom" header="Nom" filter filterPlaceholder="Nom du produit" />
          <Column field="description" header="Description" />
          <Column field="prix" header="Prix" body={(rowData) => rowData.prix + "€"} />
          <Column header="Catégorie" body={(rowData) => rowData.categorie && rowData.categorie.nom ? rowData.categorie.nom : 'Aucune catégorie'} />
          <Column field="dateCreation" header="Date de création" body={(rowData) => new Date(rowData.dateCreation).toLocaleDateString("fr-FR")} />
          <Column header="" body={(rowData) => (<button className="updateButton" onClick={() => openUpdateDialog(rowData)}><i className="pi pi-pencil" style={{ fontSize: '1.5rem' }}></i></button>)} />
          <Column header="" body={(rowData) => (<button className="deleteButton" onClick={() => openDeleteDialog(rowData)}><i className="pi pi-trash" style={{ fontSize: '1.5rem' }}></i></button>)} />
      </DataTable></>
  );
};

export default ProduitsTable;


