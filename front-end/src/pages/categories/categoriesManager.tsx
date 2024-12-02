import React, { useState } from "react";
import CategoriesTable from "./categoriesTable";
import AddCategorieDialog from "./addCategoriesDialog";
import UpdateCategorieDialog from "./updateCategorieDialog";


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
    const openDeleteDialog = (categorie:any) => {
        setDeleteDialog(true);
        setSelectedCategorieDelete(categorie);
    }
    const closeDeleteDialog = () => setDeleteDialog(false);
    
    

  return (
    <div>
      {/* Bouton dans le tableau */}
      <CategoriesTable openAddDialog={openAddDialog} openUpdateDialog={openUpdateDialog} openDeleteDialog={openDeleteDialog} setCategories={setCategories}  categories={categories}/>

      
      <AddCategorieDialog visible={addDialog} closeDialog={closeAddDialog} setCategories={setCategories} />
      
      {updateDialog && selectedCategorieUpdate&&(<UpdateCategorieDialog visible={updateDialog} selectedCategorie={selectedCategorieUpdate} closeDialog={closeUpdateDialog} setCategories={setCategories} />)}
{/* Dialogue dans un autre composant 
      {selectedProduitDelete &&(<DeleteProduitDialog visible={deleteDialog} selectedProduit={selectedProduitDelete} closeDialog={closeDeleteDialog} setProduits={setProduits} />)}
    */}</div>
  );
};

export default CategoriesManager;
