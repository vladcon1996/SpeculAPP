package currencies.service;

import currencies.ThreadManager;

import javax.xml.ws.Endpoint;

public class ExposedService {

    public static void main (String[] args) {
        try {
            // publicam la URL-ul specificat serviciul Web
            // implementat de clasa definita in Portocale.java
            Endpoint.publish ("http://localhost:8887/currency",
                    new ThreadManager());
            System.out.println("Hey");
        } catch (Exception e) {
            System.err.println ("A survenit o exceptie... \n" +
                    e.getMessage ());
        }
    }
}
