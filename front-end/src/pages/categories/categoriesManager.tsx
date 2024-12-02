import React, { useState } from "react";
import CategoriesTable from "./categoriesTable";


const CategoriesManager = () => {
    //produits
    const [categories, setCategories] = useState([]);
    //add
    const [addDialog, setAddDialog] = useState(false);
    const openAddDialog = () => setAddDialog(true);
    const closeAddDialog = () => setAddDialog(false); 
    //update
    const [updateDialog, setUpdateDialog] = useState(false);
    const [selectedCategorieUpdate, setSelectedCategorieUpdate] = useState(null);
    const openUpdateDialog = (categorie:any) => {
        setUpdateDialog(true);
        setSelectedCategorieUpdate(categorie);
    }
    const closeUpdateDialog = () => setUpdateDialog(false)
    //delete
    const [deleteDialog, setDeleteDialog] = useState(false);
    const [selectedCategorieDelete, setSelectedCategorieDelete] = useState(null);
    const openDeleteDialog = () => {
        setDeleteDialog(true);
        setSelectedCategorieDelete(null);
    }
    const closeDeleteDialog = () => setDeleteDialog(false);
    
    

  return (
    <div>
      {/* Bouton dans le tableau */}
      <CategoriesTable openAddDialog={openAddDialog} openUpdateDialog={openUpdateDialog} openDeleteDialog={openDeleteDialog} setCategories={setCategories}  categories={categories}/>

      {/* Dialogue dans un autre composant 
      <AddProduitDialog visible={addDialog} closeDialog={closeAddDialog} setProduits={setProduits} />
      {updateDialog && selectedProduitUpdate&&(<UpdateProduitDialog visible={updateDialog} selectedProduit={selectedProduitUpdate} closeDialog={closeUpdateDialog} setProduits={setProduits} />)}

      {selectedProduitDelete &&(<DeleteProduitDialog visible={deleteDialog} selectedProduit={selectedProduitDelete} closeDialog={closeDeleteDialog} setProduits={setProduits} />)}
    */}</div>
  );
};

export default CategoriesManager;
