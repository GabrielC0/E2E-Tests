describe("Gestion des tâches", () => {
  beforeEach(() => {
    cy.visit(
      "https://crm.akov-formation.fr/datas/upload/jz/qg/fv/hfZrwBlu7J.html"
    );
  });

  it("Ajoute, vérifie et supprime une tâche", () => {
    cy.get("#taskInput").type("Tâche test");
    cy.contains("Ajouter").click();
    cy.contains("Tâche test").should("be.visible");
    cy.contains("Tâche test").parent().contains("Supprimer").click();
    cy.contains("Tâche test").should("not.exist");
  });
});
