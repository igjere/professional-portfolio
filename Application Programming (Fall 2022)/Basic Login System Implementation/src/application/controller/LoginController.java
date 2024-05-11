/**
 * LoginController is a Java class containing method to run FXML file "Login".
 * 
 * @author Jeremiah Garcia (lnm248)
 * UTSA CS 3443 - Lab 5
 * Fall 2022
 */
package application.controller;

import application.Main;
import application.model.User;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.scene.Scene;
import javafx.scene.control.Button;
import javafx.scene.control.Label;
import javafx.scene.control.PasswordField;
import javafx.scene.control.TextField;
import javafx.scene.layout.AnchorPane;

import java.io.IOException;

import application.controller.UserController;

public class LoginController {
	
	public LoginController() {}

    @FXML
    private Label invalidLabel;

    @FXML
    private Button loginButton;

    @FXML
    private PasswordField pass;

    @FXML
    private TextField user;

    private User attempt = null;
    
    
    //For when the user attempts to login. If info correct, proceed to user screen. Else, tells user "Invalid login credentials"
    @FXML
    void loginPressed(ActionEvent event) {
//    	System.out.println("The following information has been entered into the username and password fields");
//    	System.out.println("Username: " + user.getText());
//    	System.out.println("Password: " + pass.getText());
    	attempt = User.validate(user.getText(), pass.getText());
    	if(attempt != null) {
    		try {
    			FXMLLoader loader = new FXMLLoader(); 
        		loader.setLocation(Main.class.getResource("view/UserView.fxml"));
        		UserController controller = new UserController();
        		loader.setController(controller);
        		AnchorPane layout = (AnchorPane) loader.load();
        		Scene scene = new Scene(layout);
        		Main.stage.setScene(scene);
        		Main.stage.setTitle("User View");
        		controller.initData(attempt);
        		Main.stage.show();
    		}
    		catch(Exception e) {
    			e.printStackTrace();
    		}
    	}
    	else {
    		invalidLabel.setText("Invalid login credentials");
    	}
    }
}
