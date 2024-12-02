import React, { useEffect, useState } from "react";
import { fetchCategories } from "./api/apiCategories";
import { DataTable } from 'primereact/datatable';
import { Column } from 'primereact/column';

const CategoriesTable = () => {
  const [categories, setCategories] = useState([]);
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState<string | null>(null);
    
  useEffect(() => {
    const getCategories = async () => {
        try {
          const data = await fetchCategories();
          setCategories(data); 
          console.log(data);
          setLoading(false);
        } catch (err) {
          setError("Impossible de récupérer les produits.");
          setLoading(false);
        }
      };
      getCategories();
  }, []);

  if (loading) return <div>Chargement...</div>;
  if (error) return <div>{error}</div>;

  return (
    <><DataTable className="DataTable DataTableCategories" value={categories} filterDisplay="row" dataKey="id" paginator rows={10} loading={loading}>
          <Column field="id" header="Id" />
          <Column field="nom" header="Nom" filter filterPlaceholder="Nom de la catégorie" />
          <Column header="Modifier" body={"Modifier"} />
          <Column header="Supprimer" body={"Supprimer"} />
      </DataTable></>
  );
};

export default CategoriesTable;


