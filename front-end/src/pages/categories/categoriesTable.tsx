import React, { useEffect, useState } from "react";
import { fetchCategories } from "../../api/apiCategories";
import { DataTable } from 'primereact/datatable';
import { Column } from 'primereact/column';
import 'primeicons/primeicons.css';

interface CategorieTableProps {
  openAddDialog: () => void; 
  setCategories: (data:any) => void;
  categories:any[];
  openUpdateDialog: (produit:any) => void; 
  openDeleteDialog: (produit:any) => void;
}

const CategoriesTable: React.FC<CategorieTableProps>= ({openAddDialog, setCategories, categories, openUpdateDialog, openDeleteDialog}) => {
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState<string | null>(null);
    
  useEffect(() => {
    const getCategories = async () => {
        try {
          const data = await fetchCategories();
          setCategories(data); 
          setLoading(false);
        } catch (err) {
          setError("Impossible de récupérer les produits.");
          setLoading(false);
        }
      };
      getCategories();
  }, []);

  if (loading) return <div></div>;
  if (error) return <div>{error}</div>;

  return (
    <><div className="flex justify-end mb-4"><button className="add addCategories" onClick={openAddDialog}><i className="pi pi-plus"style={{ fontSize: '1.4rem', marginRight:"0.7rem" }}/>Ajouter une catégorie</button></div>
    <DataTable className="DataTable DataTableCategories" value={categories} filterDisplay="row" dataKey="id" paginator rows={5} loading={loading}>
          <Column field="id" header="Id" />
          <Column field="nom" header="Nom" filter filterPlaceholder="Nom de la catégorie" />
          <Column header="" body={(rowData) => (<button className="updateButton" onClick={() => openUpdateDialog(rowData)}><i className="pi pi-pencil" style={{ fontSize: '1.5rem' }}></i></button>)} />
          <Column header="" body={(rowData) => (<button className="deleteButton" onClick={() => openDeleteDialog(rowData)}><i className="pi pi-trash" style={{ fontSize: '1.5rem' }}></i></button>)} />
      </DataTable></>
  );
};

export default CategoriesTable;


