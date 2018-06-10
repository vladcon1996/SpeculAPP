package currencies;

import org.xml.sax.SAXException;

import javax.xml.parsers.ParserConfigurationException;
import java.io.IOException;
import java.text.DecimalFormat;
import java.util.ArrayList;
import java.util.Random;

public class CurrencyThread extends Thread {

    private String currency;
    private Float intervalBg;
    private Float intervalEnd;
    private Integer time;
    private XmlParser xmlParser;
    private Float lastValue;
//    private DecimalFormat DF = new DecimalFormat("#.##");

    CurrencyThread( String currency, Float intervalBg, Float intervalEnd, Integer time , XmlParser xmlParser ) {
        this.currency = currency;
        this.intervalBg = intervalBg;
        this.intervalEnd = intervalEnd;
        this.time = time;
        this.xmlParser = xmlParser;
        this.lastValue = 0f;

        this.xmlParser.createCurrencyElement( this.currency );
    }

    @Override
    public void run() {
        Random random = new Random();
        Float generatedValue;
        while(true) {
            generatedValue = intervalBg + random.nextFloat() * ( intervalEnd - intervalBg );
            System.out.println(currency + " " + generatedValue );
            this.xmlParser.addValues(this.currency, generatedValue );
            this.lastValue = generatedValue;
            try {
                sleep(time * 1000);
            } catch (InterruptedException e) {
                e.printStackTrace();
            }
        }
    }

    Float getLastValue() {
        return lastValue;
    }

    ArrayList<Float> getAllValues() {
        try {
            return this.xmlParser.getValues(this.currency);
        } catch (Exception e) {
            e.printStackTrace();
            return null;
        }
    }
}
