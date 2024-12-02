import React, { useState } from "react";
import ProduitsTable from "./produitsTable";
import AddProduitDialog from "./addProduitDialog";
import UpdateProduitDialog from "./updateProduitDialog";

const ProduitsManager = () => {
    //produits
    const [produits, setProduits] = useState([]);
    //add
    const [addDialog, setAddDialog] = useState(false);
    const openAddDialog = () => setAddDialog(true);
    const closeAddDialog = () => setAddDialog(false); 
    //update
    const [updateDialog, setUpdateDialog] = useState(false);
    const [selectedProduit, setSelectedProduit] = useState(null);
    const openUpdateDialog = (produit:any) => {
        setUpdateDialog(true);
        setSelectedProduit(produit);
    }
    const closeUpdateDialog = () => setUpdateDialog(false);
    //delete
    const [deleteDialog, setDeleteDialog] = useState(false);
    const openDeleteDialog = () => setDeleteDialog(true);
    const closeDeleteDialog = () => setDeleteDialog(false);
    
    

  return (
    <div>
      {/* Bouton dans le tableau */}
      <ProduitsTable openAddDialog={openAddDialog} openUpdateDialog={openUpdateDialog} setProduits={setProduits}  produits={produits}/>

      {/* Dialogue dans un autre composant */}
      <AddProduitDialog visible={addDialog} closeDialog={closeAddDialog} setProduits={setProduits} />
      {selectedProduit &&(<UpdateProduitDialog visible={updateDialog} selectedProduit={selectedProduit} closeDialog={closeUpdateDialog} setProduits={setProduits} />)}
    </div>
  );
};

export default ProduitsManager;
